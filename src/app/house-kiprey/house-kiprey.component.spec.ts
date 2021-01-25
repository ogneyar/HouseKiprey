import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HouseKipreyComponent } from './house-kiprey.component';

describe('HouseKipreyComponent', () => {
  let component: HouseKipreyComponent;
  let fixture: ComponentFixture<HouseKipreyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HouseKipreyComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HouseKipreyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
