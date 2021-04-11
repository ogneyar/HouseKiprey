import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-consultant',
  templateUrl: './consultant.component.html',
  styleUrls: ['./consultant.component.scss']
})
export class ConsultantComponent implements OnInit {

  constructor() { }

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

}
