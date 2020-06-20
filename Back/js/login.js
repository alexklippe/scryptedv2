let cookie = {
	get(name) {
		matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	},
	
	set(name,value,...args) {
		switch (args.length){
			case  0:
				document.cookie = name + '=' + value + ';';
			break;
			
			case 1:
				d = Date.now();
				d += args[0]*1000;
				document.cookie = name + '=' + value + ';' + 'expires=' + d.toGMTString();
			break;
			
			case 2:
				date = true;
				d = new Date();
				switch(args[1]){
					case 'ms':
						d.setMilliseconds(d.getMilliseconds() + args[0]);
					break;
					
					case 's':
						d.setSeconds(d.getSeconds() + args[0]);
					break;
					
					case 'm':
						d.setMinutes(d.getMinutes() + args[0]);
					break;
					
					case 'h':
						d.setHours(d.getHours() + args[0]);
					break;
					
					case 'd':
						d.setDate(d.getDate() + args[0]);
					break;
					
					case 'M':
						d.setMonth(d.getMonth() + args[0]);
					break;
					
					case 'y':
						d.setFullYear(d.getFullYear() + args[0]);
					break;
					
					default:
						date = false;
				}
				if(date){
					document.cookie = name + '=' + value + ';' + 'expires=' + d.toGMTString();
				}else{
					if(args[2] == '/'){
						d = Date.now();
						d += args[0]*1000;
						path = args[2];
						document.cookie = name + '=' + value + ';' + 'expires=' + d.toGMTString();
					}else{
						return undefined;
					}
				}
			break;
		}
		
		
		
		var d = new Date();
		d.setDate(d.getSeconds() + date);
		if(date!=0){
			document.cookie = name + '=' + value + ';' + 'expires=' + d.toGMTString();
		}else{
			document.cookie = name + '=' + value + ';';
		}
		return true;
	},
	
	delete (name) {
		this.set(name, "", 0);
	}
}


/*class login() {
	constructor(){
		
	}
	
	set loginParm(){
		
	}
	
}*/








function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function deleteCookie(name) {
  setCookie(name, "", 0)
}

function setCookie(name, value, date) {
	var d = new Date();
	d.setDate(d.getSeconds() + date);
	if(date!=0){
		document.cookie = name + '=' + value + ';' + 'expires=' + d.toGMTString();
	}else{
		document.cookie = name + '=' + value + ';';
	}
	return true;
}

function tokenRe(){
	if(!getCookie('access_token')){
		if(getCookie('refresh_token')){
			refresh_token = getCookie('refresh_token');
			data = {
				refresh_token : refresh_token,
				grant_type: 'refresh_token'
			};
			axios.post('http://xn--90acibpmtad6al5fsd.xn--p1ai:8888/auth/token',{
				data
			}, {
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
				'Authorization': 'Basic Y2xpZW50LnZlcnNpb24uYWxwaGE6ZWYzYmM2ZG5pNWZkZzhta2s0cDE='
			}
			}).then( (response) => {
				setCookie('access_token', response.data['access_token'], 1);
				setCookie('refresh_token', response.data['refresh_token'],0);
				document.location.href = '/';
			}).catch( (err) => {
				console.log(err);
				alert('Ошибка!');
			});
		}
	}else{
		document.location.href = '/';
	}
}
tokenRe();

function intupLet(form){
	switch(form){
		case 0:
			if(document.getElementById('login').value == ''){
				document.getElementsByClassName('loginSpan')[0].style.display = 'block';
			}else{
				document.getElementsByClassName('loginSpan')[0].style.display = 'none';
			}
		break;
		
		case 1:
			if(document.getElementById('password').value == ''){
				document.getElementsByClassName('loginSpan')[1].style.display = 'block';
			}else{
				document.getElementsByClassName('loginSpan')[1].style.display = 'none';
			}
		break;
		
		case 2:
			if(document.getElementById('username').value == ''){
				document.getElementsByClassName('regSpan')[0].style.display = 'block';
			}else{
				document.getElementsByClassName('regSpan')[0].style.display = 'none';
			}
		break;
		
		case 3:
			if(document.getElementById('lastName').value == ''){
				document.getElementsByClassName('regSpan')[1].style.display = 'block';
			}else{
				document.getElementsByClassName('regSpan')[1].style.display = 'none';
			}
		break;
		
		case 4:
			if(document.getElementById('firstName').value == ''){
				document.getElementsByClassName('regSpan')[2].style.display = 'block';
			}else{
				document.getElementsByClassName('regSpan')[2].style.display = 'none';
			}
		break;
		
		case 5:
			if(document.getElementById('regPassword').value == ''){
				document.getElementsByClassName('regSpan')[3].style.display = 'block';
			}else{
				document.getElementsByClassName('regSpan')[3].style.display = 'none';
			}
		break;
		
		case 6:
			if(document.getElementById('regPasswordR').value == ''){
				document.getElementsByClassName('regSpan')[4].style.display = 'block';
			}else{
				document.getElementsByClassName('regSpan')[4].style.display = 'none';
			}
		break;
	}
}

var temp;

var appLogin = new Vue({
	el: '#blockAuth',
	data: {
		login: true,
		urlReg: 'http://xn--90acibpmtad6al5fsd.xn--p1ai:8888/register',
		urlLogin: 'http://xn--90acibpmtad6al5fsd.xn--p1ai:8888/auth/token',
		password: '',
		usernameLogin: '',
		passwordLogin: '',
		dataReg: {
			username : '', 
			password : '',
			firstName : '',
			lastName : ''
		}
	},
	//,created: function(){this.start();},
	methods: {
		switchLogin_Reg(i) {
			if(i){
				this.login = false;
			}else{
				this.login = true;
			}
		},
		
		reg(){
			if(this.password == this.dataReg.password){
				axios.post(this.urlReg,{
					username: this.dataReg.username,
					password : this.dataReg.password,
					firstName : this.dataReg.firstName,
					lastName : this.dataReg.lastName
				}, {
				headers: {
					'Content-Type': 'application/json',
					'Authorization': 'Basic Y2xpZW50LnZlcnNpb24uYWxwaGE6ZWYzYmM2ZG5pNWZkZzhta2s0cDE='
				}
				}).then( (response) => {
					console.log(response.data);
					temp = response.data;
					setCookie('access_token', response.data['authorization']['access_token'], 1);
					setCookie('refresh_token', response.data['authorization']['refresh_token'], 0);
					document.location.href = '/';
				}).catch( (err) => {
					console.log(err);
					alert('Ошибка!');
				});
			}else{
				alert('error!');
			}
		},
		//application/x-www-form-urlencoded
		loginGo(){
			let form = new URLSearchParams();
			form.append('username', this.usernameLogin);
			form.append('password', this.passwordLogin);
			form.append('grant_type', 'password');
			
			axios.post(this.urlLogin, form, {
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
				'Authorization': 'Basic Y2xpZW50LnZlcnNpb24uYWxwaGE6ZWYzYmM2ZG5pNWZkZzhta2s0cDE='
			}
			}).then( (response) => {
				setCookie('access_token', response.data['access_token'], 1);
				setCookie('refresh_token', response.data['refresh_token'], 0);
				document.location.href = '/';
			}).catch( (err) => {
				console.log(err);
				alert('Ошибка!');
			});
		}
	}
});







