// import the service from BrowserAnimationsModule
import {animate, AnimationBuilder, style} from '@angular/animations';
// require the service as a dependency
class MyCmp {
  constructor(private _builder: AnimationBuilder) {}

  makeAnimation(element: any) {
    // first define a reusable animation
    const myAnimation = this._builder.build([
      style({ width: 0 }),
      animate(1000, style({ width: '100px' }))
    ]);

    // use the returned factory object to create a player
    const player = myAnimation.create(element);

    player.play();
  }
}

export default MyCmp