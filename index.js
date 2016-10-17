exports.handler = function( event, context ) {
var targetSlot = event.request.intent.slots.Scene.value;
var splitword = targetSlot.split(" ");
var bulb=''; 
var onoff='';
var howmany = splitword.length;
var say='';
var i=0;
var room="";
do {
    room=room + splitword[i];
    i++;
}
while (i < howmany-1);
switch (room) {
    case "livingroomlight" : bulb=2; say='living room light';break;
    case "bedroomlight" :  bulb=1;say='bedroom light';break;
    case "downstairslight":  bulb=2;say='living room light';break;
    case "upstairslight":  bulb=1;say='bedroom light';break;
    case "livingroomlights":  bulb=2;say='living room light';break;
    case "downstairslights":  bulb=2;say='downstairs light';break;
    case "upstairslights":  bulb=1;say='upstairs light';break;
}

switch (splitword[howmany-1]) {
    case "on" : onoff='1';break;
    case "off": onoff='0';break;
    default:onoff='colour';break;
}
 
 if (onoff=='colour') {
     postData='bulb=' + bulb + '&onoff=1&colour=' + splitword[howmany-1];

 } else
 {
    postData='bulb=' + bulb + '&onoff=' + onoff;
}
     say = say + splitword[howmany-1];
      
   var http = require( 'http' );
var options = {
      host: 'mellownet.dlinkddns.com',
      path: '/lights_advanced.php?' + postData,
      port: '80',
      method: 'GET',
      'Content-Type': 'application/json'
   };  

   callback = function(response) {

      var str = '';

      response.on('data', function (chunk) {
         str += chunk;
      });

      response.on('end', function () {
         output(report, context);
      });
   };

   
   var report = 'I have turned the ' + say;
     var req = http.request(options, callback);
   console.log(report);
   console.log(postData);
      req.write(postData);
      req.end();
   if (event.request.type === "IntentRequest") {  

   }
};


function output( text, context ) {

   var response = {
      outputSpeech: {
         type: "PlainText",
         text: text
      },
      card: {
         type: "Simple",
         title: "System Data",
         content: text
      },
   shouldEndSession: true
   };

   context.succeed( {response : response} );

}
