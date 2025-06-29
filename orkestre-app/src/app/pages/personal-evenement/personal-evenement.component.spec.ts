import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PersonalEvenementComponent } from './personal-evenement.component';

describe('PersonalEvenementComponent', () => {
  let component: PersonalEvenementComponent;
  let fixture: ComponentFixture<PersonalEvenementComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PersonalEvenementComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PersonalEvenementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
