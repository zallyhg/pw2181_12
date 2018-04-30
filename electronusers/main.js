//aplicacion general 
const app=require('electron').app;
//uso de las pantallas del sistema
const BrowserWindow=require('electron').BrowserWindow;
//Ruta de la carpeta base
const path=require('path');
const url=require('url');
//ECMASCRIPT 6 = KS
let PantallaPrincipal

function muestraPantallaPrincipal(){
	PantallaPrincipal=new BrowserWindow({width:620,height:825})
	PantallaPrincipal.loadURL(url.format({
	//join concatenar cadenas
	pathname:path.join(__dirname,'index.html'),
	protocol:'file',
	slashes:true

	}));
}
app.on('ready',muestraPantallaPrincipal)