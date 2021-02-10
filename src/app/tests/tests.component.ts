import { animate, AnimationBuilder, state, style, transition, trigger } from '@angular/animations';
import { Component, OnInit } from '@angular/core';
// import MyCmp from './testAnimations'


@Component({
  selector: 'app-tests',
  templateUrl: './tests.component.html',
  styleUrls: ['./tests.component.scss'],
  animations: [
    trigger('expandedPanel', [
      state('initial', style({ height: 0 })),
      state('expanded', style({ height: '*' })),
      transition('initial <=> expanded', animate('0.3s')),
    ]),
  ],
})
export class TestsComponent {

  constructor() {
    // let func = () => {
    //   this.isExpanded = !this.isExpanded
    //   this.state = this.isExpanded ? 'expanded' : 'initial'
    // }

    // const t = "true"
    // for(let in = 0; in < 100; in++) {
      setTimeout(()=>console.log("logg"), 2000);
    // }
    
  
  }

  // ngOnInit(): void {
  // }

  // new MyCmp(AnimationBuilder).makeAnimation("h1")

  isExpanded: boolean = false
  state: string = 'initial'

  expand() {
    // while(true) {
      this.isExpanded = !this.isExpanded
      this.state = this.isExpanded ? 'expanded' : 'initial'
    // }
  }

  
  
}
