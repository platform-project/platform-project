
var canvas,
    width,
    height,
    ctx;

var bodies = [];
  
function init(){
  canvas = document.getElementById("screen");
  width = 800;
  height = 600;
  canvas.width = width;
  canvas.height = height;
  ctx = canvas.getContext('2d');
  ctx.strokeStyle="#ffffff";
  createBodies();
  
  setInterval(function(){
    updateSystem();
    updateBodies(0.005);
    ctx.clearRect(0,0,width,height);
    drawBodies();
  },1);
  
}

function createBodies(){
  bodies.push(new Body(100,300,250,Math.PI/2,100,5,true));
  bodies.push(new Body(100,210,250,Math.PI/2,10,1,true));
  
  
  bodies.push(new Body(150,300,250,Math.PI/2,100,5,true));
  bodies.push(new Body(300,150,300,0,10,3,true));
  bodies.push(new Body(350,150,300,0,10,3,true));
  
  bodies.push(new Body(400,300,0,0,10000000,15,false)); // Sun
}

function drawBodies(){
  for(var i = 0;i < bodies.length;i++)
    bodies[i].draw(ctx);
}

function updateBodies(dt){
  for(var i = 0;i < bodies.length;i++)
    bodies[i].update(dt);
}

function updateSystem(){
  var G = 1;
  
  for(var i = 0;i < bodies.length;i++)
    for(var j = 0;j < bodies.length;j++){
      if(i == j) continue;
      var b1 = bodies[i];
      var b2 = bodies[j];
      
      var dist = Math.sqrt(
        (b1.x - b2.x)*(b1.x - b2.x) + 
        (b1.y - b2.y)*(b1.y - b2.y)
      );
      
      var force = G*(b1.m * b2.m)/dist/dist;
      
      var nx = (b2.x - b1.x)/dist;
      var ny = (b2.y - b1.y)/dist;
      
      b1.ax += nx * force / b1.m;
      b1.ay += ny * force / b1.m;
      
      b2.ax -= nx * force / b2.m;
      b2.ay -= ny * force / b2.m;
      
    }
}


function Body(x,y,v,angle,mass,radius,hasTail){
  this.x = x;
  this.y = y;
  this.vx = v * Math.cos(angle);
  this.vy = v * Math.sin(angle);
  this.m = mass;
  this.radius = radius;
  this.ax = 0;
  this.ay = 0;
  
  if(hasTail)
    this.tail = new Tail(70);
  this.tailCounter = 0;
  this.tailLimit = 3;
  
  
  this.update = function(dt){
    this.vx += this.ax * dt;
    this.vy += this.ay * dt;
    
    this.x += this.vx * dt;
    this.y += this.vy * dt;
    
    this.ax = 0;
    this.ay = 0;
    
    if(this.tail){
      if(this.tailCounter > this.tailLimit){
        this.tailCounter -= this.tailLimit;
        this.tail.addPoint({x:this.x,y:this.y});
      }
      else
        this.tailCounter++;
    }
    
  };
  this.draw = function(ctx){
    ctx.beginPath();
    ctx.arc(this.x,this.y,this.radius,0,6.28);
    ctx.stroke();
    
    if(this.tail)
      this.tail.draw(ctx);
  };
}

function Tail(maxLength){
  this.points = [];
  this.maxLength = maxLength;
  this.addPoint = function(point){
    
    for(var i = Math.min(maxLength,this.points.length);i > 0;i--)
      this.points[i] = this.points[i - 1];
    
    this.points[0] = point;
  };
  this.draw = function(ctx){
    for(var i = 1; i < Math.min(this.maxLength,this.points.length);i++){
      
      if(i < this.maxLength - 20)
        ctx.globalAlpha = 1;
      else
        ctx.globalAlpha = (this.maxLength - i)/20;
      
      ctx.beginPath();
      ctx.moveTo(this.points[i - 1].x,this.points[i - 1].y);
      ctx.lineTo(this.points[i].x,this.points[i].y);
      ctx.stroke();
    }
    ctx.globalAlpha = 1;
  };
}