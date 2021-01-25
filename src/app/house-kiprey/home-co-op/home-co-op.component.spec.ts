import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeCoOpComponent } from './home-co-op.component';

describe('HomeCoOpComponent', () => {
  let component: HomeCoOpComponent;
  let fixture: ComponentFixture<HomeCoOpComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeCoOpComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeCoOpComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
