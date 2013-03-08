$(function (){
	drawMessiMessage();
});

var x=-13;
var maxWidth = 133;

function drawMessiMessage(){
	// draw();
	// return;
	var message = document.getElementById('message').value;
	console.log(document.getElementById('message').value.length);


	var canvas = document.getElementById('canv');
    var context = canvas.getContext('2d');

	var len = context.measureText(message).width;
	if(len>maxWidth*4)
			return;
	context.font = '14pt Nothing You Could Do';
	var lines = getLines(context,message,x,80,maxWidth,24);
    console.log("LINES"+lines);
    var y = -1;
    if(lines == 1){
    	y=80+25;
    }else if(lines == 2){
    	y=80+10;
    }else if(lines == 3){
    	y=80;
    }else if(lines == 4){
    	y=72;
    }else{
    	return;
    }
    var xar = [x,-11.-10,-10,-10];
    var widths = [maxWidth,132, 100, 120,130];
	var imageObj = new Image();
	imageObj.onload= function(){


		context.drawImage(imageObj,0,0);	
		context.save();
		context.font = '14pt Nothing You Could Do';
	    context.translate(canvas.width/2,canvas.height/2);
		context.rotate(-Math.PI/34);
	    
	    // context.fillStyle='#5D310C';
	    context.fillStyle='#6E421B';
	    // context.fillStyle='#946843';
		// context.fillStyle='#835732';

	    
	    wrapText(context,message,xar,y,widths,24);

	    // document.getElementById('para').innerHtml='xx'
	    // context.fillText(message, -30, 80);
	    context.restore();

	}
	canvas.width=600;
	canvas.height=450;  
	// imageObj.width="100";
	// imageObj.height="100";
	imageObj.src="img/messi_clear_opt.png"; 	
}

  function wrapText(context, text, x, y, maxWidth, lineHeight) {
    var _words = text.split(' ');
    var line = '';
    var testWidth=1;
    var words = getWords(context,_words,maxWidth);
    var lines=0;
    for(var n = 0; n < words.length; n++) {
      var testLine = line + words[n];
      var metrics = context.measureText(testLine);
      testWidth = metrics.width;
      if(testWidth > maxWidth[lines]) {
      	var xx = (maxWidth[lines] - context.measureText(line).width)/2;
        context.fillText(line, x[lines]+xx, y);
        lines++;
        line = words[n];
        y += lineHeight;
      }
      else {
        line = testLine;
      }
    }
    var xx = (maxWidth[lines] - context.measureText(line).width)/2;
    context.fillText(line, x[lines]+xx, y);
  }

  function getLines(context, text, x, y, maxWidth, lineHeight) {
    var _words = text.split(' ');
	var words = getWords(context,_words,maxWidth);
    var lines=1;
    var line = '';
    console.log(text);
    console.log(words.join());
    for(var n = 0; n < words.length; n++) {
      var testLine = line + words[n];
      var metrics = context.measureText(testLine);
      var testWidth = metrics.width;
      if(testWidth > maxWidth) {
      	lines++;
        line = words[n];
        y += lineHeight;
      }
      else {
        line = testLine;
      }
    }
    return lines;
  }

  function getWords(context,_words,maxWidth){
  	var words=[];
  	var lineIndex=0;
    for(var i=0; i<_words.length;i++){
    	var swidth = context.measureText(_words[i]).width;
    	var ratio = swidth/_words[i].length;
    	// console.log(ratio);
    	var maxStrLen = maxWidth[lineIndex]/ratio; 
    	console.log("maxStrLen="+maxStrLen+" ratio="+ratio + " swidth="+ swidth);
    	if(swidth > maxWidth[lineIndex]){
    		var str=_words[i];
    		var j=0;
    		while(str.length>0){
    			console.log("str="+str);
    			words.push(str.substring(0,Math.min(str.length,maxStrLen)));
    			str= str.substring(Math.min(maxStrLen,str.length),str.length);
    			console.log("str2="+str);
    			j++;
    		}
    		lineIndex++;
    	}else{
    		words.push(_words[i]+' ');
    	}
    }
    return words;
  }


function draw() {
  var ctx = document.getElementById('canv').getContext('2d');
  ctx.translate(75,75);
  for (i=1;i<6;i++){
    ctx.save();
    ctx.fillStyle = 'rgb('+(51*i)+','+(255-51*i)+',255)';
    for (j=0;j<i*4;j++){
	    ctx.rotate(Math.PI*2/(i*6));
	    ctx.beginPath();
	    ctx.arc(0,i*12.5,5,0,Math.PI*2,true);
	    ctx.fill();
    }
    ctx.restore();
  }
}
