$(document).ready(function(){
    $(".setting").click(function(){
		var btnClicked = this.id;
		
		$("#Profile").hide();
		$("#Password").hide();
		$("#Remove").hide();
		$("#Update").hide();
		$("#Create").hide();
		
		
		switch (btnClicked) {
			case "s1":
			$("#Password").hide();
			$("#Remove").hide();
			$("#Update").hide();
			$("#Create").hide();
			$("#Profile").slideDown();
			break;
			case "s2":
			$("#Profile").hide();
			$("#Remove").hide();
			$("#Update").hide();
			$("#Create").hide();
			$("#Password").slideDown();
			break;
			case "s3":
			$("#Password").hide();
			$("#profile").hide();
			$("#Update").hide();
			$("#Create").hide();
			$("#Remove").slideDown();
			break;
			case "s4":
			$("#profile").hide();
			$("#Password").hide();
			$("#Remove").hide();
			$("#Create").hide();
			$("#Update").slideDown();
			break;
			case "s5":
			$("#Password").hide();
			$("#profile").hide();
			$("#Remove").hide();
			$("#Update").hide();
			$("#Create").slideDown();
			break;
		}
    });
});

