<?php
   header('content-type: text/css');
   // etc.
?>

.playable{
	height : 160px;
	position: fixed;
    bottom: 0;
	left : 35%;
    width: 800px;
}

.playable .carte{
	margin-left : -50px;
}

body{
    background-color:green;
    font-family: "Comic Sans MS", cursive, sans-serif;
    font-size : 20px;
}
h1{
    font-size : 80px;
    text-align:center;
    text-decoration:underline;
}

h2{
    font-size:40px;
    text-decoration:underline;
}
h3{
    text-decoration:underline;
}
h4{
    text-decoration:underline;
}

.connect{
    margin-left:30%;
    margin-right:30%;
    padding: 30px;
    text-align:center;
    border : 1px solid black;
}

.conn{
    width: 40%;
    height:40%;
}

.retour{
    float : left;
    width: 20%;
    height:80%;
}

#cha{
	height : 250px;
	width : 500px;
	background-color : grey;
	border : 1px solid black;
	margin-top : 40%;
}

.carte{
	height : 150px;
	width : 90px;
	border : 1px solid black;

}
#tAP15{
	border : 3px solid white;
	height : 460px;
	width : 460px;
	top : 30%;
	left : 30%;
	float : right;
	position : fixed;
}

#tAP15 .carte {
	margin-left : 0px;
}

.table{
	 border : 1px solid black;
	 width : 22%;
	 float : left;
	 margin-left : 2%;
	 height : 500px;
	 text-align : center;
}

.liste{
	width : 100%;
	text-align : center;
}

#boite{
	border : 4px solid black;
	width : 20%;
	padding-left : 20px;
	background-color : #ADD8E6;
	position : fixed;
	bottom : 0;
	left : 0 ;
	height : 20%;
	padding-bottom : 10px;
}

#msg{
	font-size : 15px;
}

.joueur1{
	height : 160px;
	position: fixed;
    bottom: 0;
	left : 35%;
    width: 800px;
}

.joueur1 .carte{
	margin-left : -50px;
}


.joueur2{
	top : 25%;
	height : 800px;
	position: fixed;
    left : 0%;
    width: 160px;
}

.joueur2 .carte{
	transform: rotate(90deg);
	margin-top : -100px;
}

.joueur3{
	height : 160px;
	position: fixed;
    top: 0;
	left : 35%;
    width: 800px;
}

.joueur3 .carte{
	transform: rotate(180deg);
	margin-left : -50px;
}

.joueur4{
	top : 25%;
	height : 800px;
	position: fixed;
    left : 90%;
    width: 160px;
}

.joueur4 .carte{
	transform: rotate(270deg);
	margin-top : -100px;
}
.joueur6{
    height : 160px;
    position: fixed;
    bottom: 0;
    left : 35%;
    width: 800px;
}

.joueur6 .carte{
    margin-left : -50px;
}
