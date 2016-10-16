exports.handler = function( event, context ) {
var targetSlot = event.request.intent.slots.Scene.value;
 switch (targetSlot) {
        case "living room light on" :  postData = "bulb=2&onoff=1"; break;
        case "living room light off" : postData = "bulb=2&onoff=0"; break; 
         case "bedroom light on" :  postData = "bulb=1&onoff=1"; break;
        case "bedroom light off" : postData = "bulb=1&onoff=0"; break; 
           case "living room lights on" :  postData = "bulb=2&onoff=1"; break;
        case "living room lights off" : postData = "bulb=2&onoff=0"; break; 
         case "bedroom lights on" :  postData = "bulb=1&onoff=1"; break;
        case "bedroom lights off" : postData = "bulb=1&onoff=0"; break; 
        case "all lights on" : postData ="bulb=all&onoff=1"; break;
        case "all lights off" : postData="bulb=all&onoff=0";break;
        case "living room lights blue" : postData="bulb=2&onoff=1&colour=blue";break;
        case "living room lights white" : postData="bulb=2&onoff=1&colour=white";break;
        case "downstairs lights on" : postData="bulb=2&onoff=1"; break;
        case "downstairs lights off" : postData="bulb=2&onoff=0"; break;
        case "upstairs lights on": postData="bulb=1&onoff=1"; break;
        case "upstairs lights off": postData="bulb=1&onoff=0";break;
      }
      
   var http = require( 'http' );
var options = {
      host: '<External IP Address to your raspberry pi>',
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

   
   var report = 'I have turned the ' + targetSlot;
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
