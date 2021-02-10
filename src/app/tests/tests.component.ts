import { AnimationBuilder } from '@angular/animations';
import { Component, OnInit } from '@angular/core';
import MyCmp from './testAnimations'


@Component({
  selector: 'app-tests',
  templateUrl: './tests.component.html',
  styleUrls: ['./tests.component.scss']
})
export class TestsComponent implements OnInit {

  constructor() { 
    
  }

  ngOnInit(): void {
  }

  // new MyCmp(AnimationBuilder).makeAnimation("h1")


}
