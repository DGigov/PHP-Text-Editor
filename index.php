<?php 
  session_start(); 
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="newcss.css" type="text/css"/>
        <title>Начало</title>
    </head>
    <body><canvas id="canvas1" style="z-index:-1; position:absolute; left:0px; top:0px; width:100%; height:100%;"></canvas><div id="ex3_container">
    
    <canvas id="canvas3" style="position:absolute; left:0px; top:25px; width:700px; height:100px;"></canvas>
        <?php 
            
            if(!$_SESSION)
            {
            	echo "<canvas id='canvas4' style='z-index:1; position:absolute; left:0px; top:0px; width:715px; height:665px;'></canvas>";
                echo "<center><h1>Welcome Quest!</h1><br><br><br><br><div id='message'> <a href=login_form.php>Login</a> | <a href=register_form.php>Register</a></center>";
                
            }
            else{
                $username = $_SESSION['username']; 
                $password = $_SESSION['password']; 

                
                if($username && $password){ 
             
                    echo "Welcome ".$username." ( <a href=logout.php>Logout</a> )<br>"; 
                    ?>
                    <canvas id="canvas2" style="position:absolute; left:5px; top:450px; width:180px; height:200px;"></canvas>
                   <hr><h1>Проект текстов редактор</h1><hr><br><div id="browser">
                     <?php
                     	$dir = "/home/gigovuch/public_html/project/files/";
			$files = scandir($dir);
			echo ' <center>File Browser:</center><hr><form action="" method="post" >';
			foreach($files as $file) {
			echo '<input type="radio" name="fi" value="'.$dir.$file.'">'.$file.'<br>';  
  			}
  			$fname= $_POST['fi'];  	
        		?>
        		<center><br><input type="submit" value="Open File" name="enter" id="right"/><br>
        		</center>
        		</form></div>Points.txt:
                        
                    
                     
                     <div id="ex3_content">
                     <form action="FileData.php" method="post" enctype="multipart/form-data">
                     <input type="submit" value="New File" name="new" id="right" />
                     <input type="text" name="newf" id="right" size="30" required="required"/>
                     <br>
                     </form><br>
                     <?php
                     
                        if(isset($_POST['enter'])&& !empty($_POST['fi']))
                        {
                            $_SESSION['fname'] = $fname;
                            $handle = file($fname);
                            echo $fname.':';
                     ?><br><center>
                            <form method = "post" action="FileData.php">
                              <br>
                              <textarea name="notes" rows="28" cols="68">
                              <?php
                                  foreach ($handle as $data)
                                      {
                                          echo $data;
                                      }
                              ?>
                              </textarea><br>
                              <input type="submit" value="Запази файла" />
                              
                              <input type="submit" value="Изтрий файла" name="del"/>  
                            </form></center></div>
                         <?php
                        }
                        else
                        { 
                            if(isset($_POST['enter2'])&& !empty($_POST['newf']))
                            {
                                if(file_exists($dir.$_POST['newf'])){
                                    echo 'Съществува файл с такова име!';
                                }
                                else{
                                   
                                    fopen($dir.$_POST['newf'], "w");
                                    echo 'Беше създаден нов файл с име:';
                                    echo $_POST['newf'];
                                    
                                    }
                            }
                           // var_dump($_POST['files']); 
                            else {
                                echo 'Please Open File or create new';
                            }
                        }
                }
              
            }
         ?>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/processing.js/1.4.8/processing.min.js"></script> 
	<script>
		
		var canvas = document.getElementById("canvas1");
var ppp = new Processing(canvas, sketch);
function sketch(p) {
var quantity = 300;
var xPosition = [];
var yPosition = [];
var flakeSize = [];
var direction = [];
var minFlakeSize = 1;
var maxFlakeSize = 5;
var w=document.documentElement.clientWidth; 
var h=document.documentElement.clientHeight; 

   p.setup = function() {
   p.size(w,h);
  p.frameRate(30);
  p.noStroke();
  p.smooth();
  
  for(var i = 0; i < quantity; i++) {
    flakeSize[i] = p.round(p.random(minFlakeSize, maxFlakeSize));
    xPosition[i] = p.random(0, p.width);
    yPosition[i] = p.random(0,p.height);
    direction[i] = p.round(p.random(0, 1));
  }
   }
    p.draw = function() { 
     p.background(0);
  
  for(var i = 0; i < xPosition.length; i++) {
    
    p.ellipse(xPosition[i], yPosition[i], flakeSize[i], flakeSize[i]);
    
    if(direction[i] == 0) {
      xPosition[i] += p.map(flakeSize[i], minFlakeSize, maxFlakeSize, .1, .5);
    } else {
      xPosition[i] -= p.map(flakeSize[i], minFlakeSize, maxFlakeSize, .1, .5);
    }
    
    yPosition[i] += flakeSize[i] + direction[i]; 
    
    if(xPosition[i] > p.width + flakeSize[i] || xPosition[i] < -flakeSize[i] || yPosition[i] > p.height + flakeSize[i]) {
      xPosition[i] = p.random(0, p.width);
      yPosition[i] = -flakeSize[i];
    }
    
  }
   }
   

}


var canvas4 = document.getElementById("canvas4");
if (canvas4 !== null) {

var p = new Processing(canvas4, sketch);

function sketch($p) {
    var Spring2D = (function() {
        function Spring2D() {
            var $this_1 = this;

            function $superCstr() {
                $p.extendClassChain($this_1)
            }
            $this_1.vx = 0;
            $this_1.vy = 0;
            $this_1.x = 0;
            $this_1.y = 0;
            $this_1.gravity = 0;
            $this_1.mass = 0;
            
            $this_1.stiffness = 0.3;
            $this_1.damping = 0.6;

            function update$2(targetX, targetY) {
                var forceX = (targetX - $this_1.x) * $this_1.stiffness;
                var ax = forceX / $this_1.mass;
                $this_1.vx = $this_1.damping * ($this_1.vx + ax);
                $this_1.x += $this_1.vx;
                var forceY = (targetY - $this_1.y) * $this_1.stiffness;
                forceY += $this_1.gravity;
                var ay = forceY / $this_1.mass;
                $this_1.vy = $this_1.damping * ($this_1.vy + ay);
                $this_1.y += $this_1.vy;
            }
            $p.addMethod($this_1, 'update', update$2, false);

            function display$2(text, nx, ny) {
                $p.noStroke();
                
                $p.text(text, $this_1.x, $this_1.y);
                
            }
            $p.addMethod($this_1, 'display', display$2, false);

            function $constr_4(xpos, ypos, m, g) {
                $superCstr();

                $this_1.x = xpos;
                $this_1.y = ypos;
                $this_1.mass = m;
                $this_1.gravity = g;
            }

            function $constr() {
                if (arguments.length === 4) {
                    $constr_4.apply($this_1, arguments);
                } else $superCstr();
            }
            $constr.apply(null, arguments);
        }
        return Spring2D;
    })();
    $p.Spring2D = Spring2D;

    var s1 = null,
        s2 = null;

    var gravity = 9.0;
    var mass = 2.0;

    function setup() {
        $p.size(720, 670);
        
        s1 = new Spring2D(0.0, $p.width / 2, mass, gravity);
        s2 = new Spring2D(0.0, $p.width / 2, mass, gravity);
        s3 = new Spring2D(0.0, $p.width / 2, mass, gravity);
        s4 = new Spring2D(0.0, $p.width / 2, mass, gravity);
        s5 = new Spring2D(0.0, $p.width / 2, mass, gravity);
        font = $p.createFont("LetterGothicStd.ttf", 22);
  		$p.textFont(font);
    }
    $p.setup = setup;
    setup = setup.bind($p);

    function draw() {
        $p.background(0,0,0,1);
        s1.update($p.mouseX, $p.mouseY);
        s1.display('G',$p.mouseX, $p.mouseY);
        s2.update(s1.x, s1.y);
        s2.display('I',s1.x, s1.y);
        s3.update(s2.x, s2.y);
        s3.display('G',s2.x, s2.y);
        s4.update(s3.x, s3.y);
        s4.display('O',s3.x, s3.y);
        s5.update(s4.x, s4.y);
        s5.display('V',s4.x, s4.y);
        
    }
    $p.draw = draw;
    draw = draw.bind($p);

}
}

var canvas2 = document.getElementById("canvas2");
if (canvas2 !== null) {
var ppp2 = new Processing(canvas2, sketch2);

function sketch2($p) {

    var lines = null;
    var index = 0;

    function setup() {
        $p.size(180, 200);
        $p.background(0);
        $p.stroke(255);
        $p.frameRate(12);
        lines = $p.loadStrings("files/Points.txt");
    }
    $p.setup = setup;
    setup = setup.bind($p);

    function draw() {
    	$p.stroke(255,0,0);
        if (index < lines.length) {
            var pieces = $p.split(lines[index], (new $p.Character('\t')));
            if (pieces.length == 4) {
                var x = $p.parseInt(pieces[0]) * 2;
                var y = $p.parseInt(pieces[1]) * 2;
                var nx = $p.parseInt(pieces[2]) * 2;
                var ny = $p.parseInt(pieces[3]) * 2;
                $p.line(x, y, nx, ny);
            }
            index = index + 1;
        }
    }
    $p.draw = draw;
    draw = draw.bind($p);
}
}

var canvas3 = document.getElementById("canvas3");
var p3 = new Processing(canvas3, sketch3);
function sketch3(p3) {
var font = new PFont;
var x = 1;
var y = 4;
var vx = 300;
var vy = 0;
var dt = 1.0/100.0;
var gravity = 100;
var restitution = .9;

p3.setup = function() {
  p3.size(720, 93);
  p3.frameRate(30);
  p3.smooth();
  font = p3.createFont("LetterGothicStd.ttf", 22);
  p3.textFont(font);
}

p3.draw = function() {
  p3.background(0,0,0,1);
  p3.text("Деян Гигов F35572", x, y);
  vy += gravity*dt;
  x += vx*dt;
  y += vy*dt;
  if (x < 0){
    x = 0;
    vx *= -restitution;
  } else if (x > p3.width-200){
    x = p3.width-200;
    vx *= -restitution;
  }
  if (y > p3.height){
    y = p3.height;
    vy *= -restitution;
  }
}
}



		</script>
    </body>
</html>
