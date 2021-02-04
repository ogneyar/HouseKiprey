import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PositiveComponent } from './positive.component';

describe('PositiveComponent', () => {
  let component: PositiveComponent;
  let fixture: ComponentFixture<PositiveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PositiveComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PositiveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
