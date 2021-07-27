//changeLanguage()
//executeCode()

let editor;

window.onload = function(){
    //Set Editor to Edit
    editor = ace.edit("editor");
    //Set Theme to Edit
    editor.setTheme("ace/theme/monokai");  
    editor.session.setMode("ace/mode/c_cpp");
}

function changeLanguage() {
     let language = $("#language").val();
     
     //Changing editor session and Syntax highlighter
     if(language == 'c' || language == 'cpp')editor.session.setMode("ace/mode/c_cpp");
     else if(language == 'php')editor.session.setMode("ace/mode/php");
     else if(language == 'python')editor.session.setMode("ace/mode/python");
     else if(language == 'node')editor.session.setMode("ace/mode/javascript");
}

function executeCode() {
    
    //Ajax to run without reloading
    $.ajax({

        url: "/ide/app/compiler.php",

        method: "POST",

        data: {
            language: $("#language").val(),
            code: editor.getSession().getValue()
        },

        success: function(response){
            $(".output").text(response)
        }
    })
}
