import { Component, OnInit } from '@angular/core';

// const imgMenu = document.getElementById("img-menu")


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  constructor() { 
    
  }

  ngOnInit(): void {
    
  }

  
  imgMenuOnClick() {
    let menuBox = document.getElementById("menu-box")
    let menuFon = document.getElementById("menu-fon")
    // console.log(menu);
    menuBox.style.top = "70px";
    menuFon.style.display = "block";
  }

  fonMenuOnClick() {
    let menuBox = document.getElementById("menu-box")
    let menuFon = document.getElementById("menu-fon")
    // console.log(menu);
    menuBox.style.top = "-400px";
    menuFon.style.display = "none";
  }

}
