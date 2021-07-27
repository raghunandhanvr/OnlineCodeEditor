/* 
Get Post parameters

Store Programs to Temp file and show in output component

Enter your Path to Code Compiler in each languages
    - If your gcc compiler or others already in your Environmental Path, you can jsut give gcc

If you're deploying this, install compilers in Machines and enter its Path to execute
*/

<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];                                          #To get post parameters

    $random = substr(md5(mt_rand()), 0, 7);                          #Store Program files name randomly
    $filePath = "temp/" .$random . "." . $language;
    $programFile = fopen($filePath, "w");                            #Open and write into temp direcoty from editor component 
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("Enter/Your/Path $filePath 2>&1");       #Enter You Path to Execute PHP scripts
        echo $output;
    }

    if($language == "python") {
        $output = shell_exec("Enter/Your/Path $filePath 2>&1");      
        echo $output;
    }

    if($language == "node") {
        rename($filePath, $filePath.".js");
        $output = shell_exec("node $filePath.js 2>&1");
        echo $output;
    }

    if($language == "c") {
        $outputExe = $random. ".exe";
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }

    if($language == "cpp") {
        $outputExe = $random. ".exe";
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }



    