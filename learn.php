
<?php 
   echo "php is working priya <br>";
   //this is a single line comment
   /* multiline comment */
   //variables: strings ,integers,float,boolean
   $name=" priyanka";//string
   $email="priya@1234";//string
   $age=20;//integer
   $cgpa=9.6;//float
   //boolean=true or false
   echo " Hello {$name}<br>";
   echo " your <br> age:{$age} <br>mail:{$email}<br> and cgpa:{$cgpa} <br>";
   //Arthematic operators:+,-,*,/,**,%
   $x=10;
   $y=3;
   $z=null;
   $z=$x+$y;
   echo "z={$z} <br>";
   $a=10;
   $b=15;
   echo "sum of a=$a and b=$b is :".($a+$b)."<br>";
   echo "difference of a=$a and b=$b is :".($a-$b)."<br>";
   echo "multiplication of a=$a and b=$b is :".($a*$b)."<br>";
   echo "quotient of a=$a and b=$b is :".($a/$b)."<br>";
   echo "remainder of a=$a and b=$b is :".($a%$b)."<br>";
   //assignment operators
   $a+=5;
   echo "after using assignment operator a is ".($a)."<br>";
   //comparision
   var_dump($a==$b);
   echo "<br>";
   var_dump($a>$b) ;
   echo "<br>";
   //logical operators 
   if($a>5 && $b>20){
    echo "condiition true "."<br>";
   }
   else{
    echo "condition fails"."<br>";
   }
   //string functions
   $name="paiya";
   $name=strtolower($name);
   $name=strtoupper($name);
   $name=trim($name);
   $name=str_pad($name,8,"a");
   $name=strrev($name);
   $name=str_replace("-","",$name);
   $name=strtolower($name);

   //conditional statements
   //if
   $age=19;
   if($age>=18){
    echo "you are elegible to vote";
   }
   //if-else
   if($a>5 && $b>20){
    echo "condiition true "."<br>";
   }
   else{
    echo "condition fails"."<br>";
   }
   //if-elseif-else
   $marks=65;
   if($marks>=80)
       echo "you are first";
    elseif($marks>=70)
       echo  "you are second";
    else
        echo "nuvvu neenu okateee";
    //loops
    //1 forloop
    for($i=1;$i<10;$i++){
         echo $i ."<br>";
    }
    //2 while loop
    echo "while loop"."<br>";
    $i = 1;
   while ($i <= 5) {
      echo $i . "<br>";
       $i++;
    }
    //for each loop for arrays
    $frts=["aple","guava","pne aple"];
    foreach ($frts as $frt){
        echo $frt ."<br>";
    }
    //functions
    //1.simple function
    function sayhello(){
        echo "hello priya <br>";
    }
    sayhello();
    //2 functions fwith parameters
    function add($a, $b) {
        return $a + $b;
    }
    echo add(5, 3);
    echo "<br>";
    //q1:largest among 3
    $p=10;
    $q=20;
    $r=2;
    if($p>$q and $p>$r)
        echo "p is largest ".($p)."<br>";
    elseif($q>$p and $q>$r)
        echo "q is largest ".($q)."<br>";
    else
        echo "r is largest".($r);


   /* 4_GET ,$_POST=special variables used to collect data from an html form data is sent to the file  
   in the action attribute of <form> 
   ex: <form action="ex.php" method="get">
   $_GET=data is appended to the url
         not secure
         char limit
         bookmark is possible \w values
         GETrequests can be cached
         better for a search page 
    $_POST= data is packaged inside the body of the HTTPrequest
            moresecure
            no data limit
            cannot bookmark
            GET requests aare not cached 
            better for submitting credentials */
    //echo "{$_GET["username"]} . <br>";
   // echo "{$_GET["password"]} . <br> ";// . <br>is for break
   /* while using get method the url apeearing in the chrome is
    http://localhost/test.php?username=priya&password=priya%402006 
    it shows my username and password  so....get methos is not secure */
//echo "{$_POST["username"]} <br>";
//echo "{$_POST["password"]} <br> ";
   /* WHILE USING THE POST METHOD the url appears like
    localhost://test.php it means it hides the data */ 
 $item="biriyani";
$price=180;
$quantity=$_POST['quantity'];
$total=$price*$quantity;
echo "<h3>Bill Details</h3>";
echo "price of each one:".$price ."<br>";
echo "quantity u had taken:".$quantity ."<br>";
echo "Total Payment:" .$total ."<br>"; 
//isset()= it returns true when variable is declared and not null
//empty()=it returns true when variable is not declared and having  false,nul
$name="priya";
if(isset($name))
    echo "variable is set";
else
    echo "variable is not set"."<br>";
//filte_input is a method to use rather than direct post and get
//filter_input(type, variable_name, filter);
if(isset($_POST["login"])){
    $usrname=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
    echo "hello {$usrname}"."<br>";
    $age=filter_input(INPUT_POST,"age",FILTER_SANITIZE_NUMBER_INT);
    echo " your age is {$age}";
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post">
        <label>quantity</label>
        <input type="number" name="quantity"><br>
        <input type="submit" name="total">
    </form>
    <form action="test.php" method="post">
        <label>USERNAME:</label>
        <input type="text" name="username"><br>
        <label>EMAIL:</label>
        <input type="text" name="email"><br>
        <label>age:</label>
        <input type="number" name="username"><br>
        <input type="submit" name="login">
        
   </form>
</body>
</html>
