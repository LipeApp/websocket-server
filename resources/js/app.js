import './bootstrap';

let onlineUsers = 0;

function update_online_counter() {
    document.getElementById('online').textContent = '' + onlineUsers;
}

Echo.channel('passport_detail.1')
    .listen('.my-event', (e)=>{
        console.log(e)
    })
