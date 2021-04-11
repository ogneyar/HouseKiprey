import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-consultant',
  templateUrl: './consultant.component.html',
  styleUrls: ['./consultant.component.scss']
})
export class ConsultantComponent implements OnInit {
  
  socket = null;

  constructor() { 
    this.WebSocket();
  }

  ngOnInit(): void {
    
  }
  
  open() {
    let consultantForm = document.getElementById("consultant-form");

    consultantForm.style.visibility = "visible";
    consultantForm.style.display = "block";
    consultantForm.style.opacity = "0.9";
  }

  close() {
    let consultantForm = document.getElementById("consultant-form");

    consultantForm.style.visibility = "hidden";
    consultantForm.style.display = "none";
    consultantForm.style.opacity = "0";
  }

  WebSocket() {
    // let socket;
    try {

      this.socket = new WebSocket('wss://consultant-mod.herokuapp.com/')
      // canvasState.setSocket(socket)
      // canvasState.setSessionId(params.id)
      this.socket.onopen = () => {
        console.log("Подключение установлено")
        
        this.socket.send(JSON.stringify({
          method: 'connection',
          id: "params.id",
          username: "canvasState.username"
        }))
        
      }
      this.socket.onmessage = (event) => {
        let msg = JSON.parse(event.data)
        // eslint-disable-next-line
        switch (msg.method) {
          case 'connection':
            console.log(`Пользователь ${msg.username} присоединился`);
            break
          case 'send':
            this.MessageHandler(msg)
            break
        }
      }

    }catch(e) {
      console.log("catch error");
    }
    
  }

  MessageHandler(msg) {
    console.log(msg);
  }

  SendMessage() {
    this.socket.send(JSON.stringify({
      method: 'send',
      id: "unknown",
      username: "Ogneyar"
    }))
  }

}
