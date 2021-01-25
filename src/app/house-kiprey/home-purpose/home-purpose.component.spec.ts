import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomePurposeComponent } from './home-purpose.component';

describe('HomePurposeComponent', () => {
  let component: HomePurposeComponent;
  let fixture: ComponentFixture<HomePurposeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomePurposeComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomePurposeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
