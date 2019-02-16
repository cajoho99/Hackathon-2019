function ajaxFunction(destID, targetPHP, query) {
  var ajaxRequest; // The variable that makes Ajax possible!
  try {
    // Opera 8.0+, Firefox, Safari
    ajaxRequest = new XMLHttpRequest();
  } catch (e) {
    // Internet Explorer Browsers
    try {
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        // Something went wrong
        alert("Your browser broke!");
        return false;
      }
    }
  }

  // Create a function that will receive data
  // sent from the server and will update
  // div section in the same page.

  ajaxRequest.onreadystatechange = function() {
    if (ajaxRequest.readyState == 4) {
      var ajaxDisplay = document.getElementById(destID);
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
    }
  };

  // Now get the value from user and pass it to
  // server script.
  //***GET***********************************************
  //ex query='?name=David&age=18'
  //in PHP $_GET['name']==David , $_GET['age']==18 (text)
  //***POST**********************************************
  //ex query='name=David&age=18'
  //in PHP $_POST['name']==David , $_POST['age']==18 (text)
  //********************************************************

  //POST
  ajaxRequest.open("POST", targetPHP, true);
  ajaxRequest.setRequestHeader(
    "Content-type",
    "application/x-www-form-urlencoded"
  );
  ajaxRequest.send(query);

  /*GET
	ajaxRequest.open("GET", targetPHP + query, true);
	ajaxRequest.send(void); 
	*/
}

function createUser() {
  var query =
    "user_name=" +
    document.getElementById("username") +
    "&first_name=" +
    dokument.getElementById("firstname") +
    "&last_name=" +
    document.getElementById("inlastname") +
    "&user_password" +
    document.getElementById("password");

  ajaxFunction("Messagebox", "NewUser.php", query);
}

function testing() {
  alert("Hello");
}
// function sendData()
// {
// 	//Resulterande query =='First_name=[First_name]&Last_name=[Last_name]&Email=[Email]&CC=[CC]&Phone_number=[Phone_number]'
// 	var query = "First_name=" + document.getElementById('First_name').value;
// 	query+= "&Last_name=" + document.getElementById('Last_name').value;
// 	query+= "&Email=" + document.getElementById('Email').value;
// 	query+= "&CC=" + document.getElementById('CC').value;
// 	query+= "&Phone_number=" + document.getElementById('Phone_number').value;

// 	//POST
// 	ajaxFunction("answer","SendData.php",query);

// 	//GET
// 	//ajaxFunction("answer","SendData.php","?" + query);
// }

// function viewData()
// {
// 	var table = document.getElementById('tableName').value;
// 	if(table=="")
// 		return;

// 	document.getElementById("Data").innerHTML="";
// 	ajaxFunction("Data","ViewData.php","table="+table);
// }

// function deleteData()
// {
// 	var ID = document.getElementById('deleteID').value;
// 	if(ID=="")
// 		return;

// 	document.getElementById("answer").innerHTML="";
// 	ajaxFunction("answer","DeleteData.php","ID="+ID);
// }
