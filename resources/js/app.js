import './bootstrap';
const channel = Echo.channel('my-channel.1');
channel.subscribed(function (){
    console.log('subscribed!')
}).listen('.my-event', (e)=>{
    console.log(e)
})

