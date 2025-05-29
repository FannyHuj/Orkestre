import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CardEvenementComponent } from './card-evenement.component';

describe('CardEvenementComponent', () => {
  let component: CardEvenementComponent;
  let fixture: ComponentFixture<CardEvenementComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CardEvenementComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CardEvenementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
