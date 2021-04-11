import { Component, OnInit } from '@angular/core';
import { environment } from '../../../environments/environment';

@Component({
  selector: 'app-consultant',
  templateUrl: './consultant.component.html',
  styleUrls: ['./consultant.component.scss']
})
export class ConsultantComponent implements OnInit {
  
  socket = null;
  id = `f${(+ new Date()).toString(16)}`;

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

      // console.log(environment.ws_url);
      
      // this.socket = new WebSocket('ws://localhost/')
      // this.socket = new WebSocket('wss://house-kiprey.herokuapp.com/')

      this.socket.onopen = () => {
        console.log("Подключение установлено")
        
        this.socket.send(JSON.stringify({
          method: 'connection',
          id: this.id,
          username: "unknown"
        }))
        
      }
      this.socket.onmessage = (event) => {
        let msg = JSON.parse(event.data)
        // eslint-disable-next-line
        switch (msg.method) {
          case 'connection':
            console.log(`Пользователь ${msg.username} присоединился`);
            console.log(`Его id: ${msg.id}`);
            break
          case 'send':
            console.log(`${msg.username} пишет: ${msg.text}`);
            break
        }
      }

    }catch(e) {
      console.log("catch error");
    }
    
  }

  // SendMessage(text) {
  SendMessage() {

    // console.log(text);

    this.socket.send(JSON.stringify({
      method: 'send',
      id: this.id,
      username: "client",
      text: "text"
    }))

    let dialog = document.getElementById("dialog");
    let consultant__dialog = document.getElementById("consultant__dialog");

    consultant__dialog.style.visibility = "visible";
    consultant__dialog.style.display = "block";
    consultant__dialog.style.opacity = "0.9";

    dialog.innerHTML = "Сообщение отправлено. Ожидайте..."
    setTimeout(() => {
      dialog.innerHTML = "Здравствуйте, чем могу помочь?"
      consultant__dialog.style.visibility = "hidden";
      consultant__dialog.style.display = "none";
      consultant__dialog.style.opacity = "0";
    },2000)
  }

}
