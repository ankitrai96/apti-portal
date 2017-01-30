function Damn(){
    this.render = function(header,dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = header;
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
    }
	this.ok = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
    this.duck1 = function(){
        document.getElementById('login_box').style.display = "none";
        document.getElementById('signup_box').style.display = "block";       
    }
    this.duck2 = function(){
        document.getElementById('signup_box').style.display = "none";
        document.getElementById('login_box').style.display = "block";
    }
    this.duck0 = function(){
        document.getElementById('login_box').style.display = "none";
        document.getElementById('admin_box').style.display = "block";       
    }
    this.dumb0 = function(){
        document.getElementById('login_box').style.display = "block";
        document.getElementById('admin_box').style.display = "none";       
    }
}
var damn = new Damn();
