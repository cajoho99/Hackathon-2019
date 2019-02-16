$( document ).ready(function() {
    var screensize = window.innerHeight +"px";
    $("body").css("height", screensize);
    $("#main").css("height", screensize);
    
    
    var counter;
    /*$.post("phpreqs/getNofCourses", function(data)){
           counter = parseInt(data);
           }*/
    counter = 3;
    
    function setCourseList(){
    for(var i = 0; i < counter; i++ ){
        var content = getCourseAt(i);
        $("#courseslist").append(
            "<div class=\"coursebutton\"> <p class=\"coursetext\">" + content + "</p></div>"
        )
    }
    
    }
    
    function getCourseAt(x){
        var temp = "";
        var countcomma = 0;
        var rtnstring = "";
        //$.post("phpreqs/getCourseCodes", function(data)){
            temp = "EDA443,TMV200,";
           for(var i = 0; i < temp.length; i++){
                if(temp.charAt(i) === "," ){
                    if(x === countcomma++){
                        for(var j = 6; j > 0; j--){
                            rtnstring += temp.charAt(i - j);
                            
                        }
                        break;
                    }
                }
            }
           return rtnstring;
    }
    
    setCourseList();
    
    
    $(".coursebutton").click(function(){
        var cont = this.text();
        $("#courseshort").text(cont);
        alert("yeet");
    });
   
   
});