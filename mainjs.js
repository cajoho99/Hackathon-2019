

$(document).ready(function () {
    var screensize = window.innerHeight + "px";
    $("body").css("height", screensize);
    $("#main").css("height", screensize);



    $.post("backend/getNofCourses.php", function (data) {

        counter = data;
        setCourseList(data);
    });


    function setCourseList(x) {

        for (var i = 0; i < x; i++) {
            var content = getCourseAt(i, content => {
                alert(content);
                $("#courseslist").append(
                    "<div class=\"coursebutton\"> <p class=\"coursetext\">" + content + "</p></div>"
                )
            });


        }

    }

    function getCourseAt(x, callback) {
        var temp = "";
        var countcomma = 0;
        var rtnstring = "";
        $.post("backend/getCourseCodes.php", function (data) {

            temp = data + "";

            for (var i = 0; i < temp.length; i++) {
                if (temp.charAt(i) === ",") {
                    if (x === countcomma++) {
                        for (var j = 6; j > 0; j--) {
                            rtnstring += temp.charAt(i - j);

                        }
                        break;
                    }
                }
            }
            callback(rtnstring);
        });




        $(".coursebutton").click(function () {
            var cont = this.text();
            $("#courseshort").text(cont);
            alert("yeet");
        });


    };


});
