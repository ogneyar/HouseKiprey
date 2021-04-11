import { Component, OnInit } from '@angular/core';
import { environment } from '../../../environments/environment';

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

  ngOnInit(): void { }
  
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
    
    try {
      this.socket = new WebSocket(environment.ws_url)

      console.log(environment.ws_url);
      

      // this.socket = new WebSocket('ws://localhost/')
      // this.socket = new WebSocket('wss://house-kiprey.herokuapp.com/')

      // canvasState.setSocket(socket)
      // canvasState.setSessionId(params.id)

      this.socket.onopen = () => {
        console.log("Подключение установлено")
        
        this.socket.send(JSON.stringify({
          method: 'connection',
          id: "unknown",
          username: "username"
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
            // this.MessageHandler(msg)
            console.log(msg);
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

    console.log("Кнопка нажата");

    this.socket.send(JSON.stringify({
      method: 'send',
      id: "unknown",
      username: "Ogneyar"
    }))
  }

}
