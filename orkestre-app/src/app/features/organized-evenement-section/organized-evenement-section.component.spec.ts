import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OrganizedEvenementSectionComponent } from './organized-evenement-section.component';

describe('OrganizedEvenementSectionComponent', () => {
  let component: OrganizedEvenementSectionComponent;
  let fixture: ComponentFixture<OrganizedEvenementSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [OrganizedEvenementSectionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OrganizedEvenementSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
