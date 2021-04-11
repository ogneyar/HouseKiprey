import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-consultant',
  templateUrl: './consultant.component.html',
  styleUrls: ['./consultant.component.scss']
})
export class ConsultantComponent implements OnInit {

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
    const socket = new WebSocket('ws://consultant.herokuapp.com/')
    // canvasState.setSocket(socket)
    // canvasState.setSessionId(params.id)

    socket.onopen = () => {
        console.log("Подключение установлено")
        socket.send(JSON.stringify({
            method: 'connection',
            id: "params.id",
            username: "canvasState.username"
        }))
    }
    socket.onmessage = (event) => {
        let msg = JSON.parse(event.data)
        // eslint-disable-next-line
        switch (msg.method) {
            case 'connection':
                console.log(`Пользователь ${msg.username} присоединился`);
                break
            case 'draw':
              this.MessageHandler(msg)
                break

        }
    }
  }

  MessageHandler(msg) {
    console.log(msg);
  }

}
