import { CommonModule } from '@angular/common';
import { Component, EventEmitter, Output} from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Evenement } from '../../shared/models/evenement';
import { EvenementService } from '../../services/evenement.service';
import { EvenementFiltersComponent } from '../evenement-filters/evenement-filters.component';
import { EvenementRegistrationComponent } from '../evenement-registration/evenement-registration.component';


@Component({
  selector: 'app-card-evenement',
  imports: [CommonModule, FormsModule, RouterModule,EvenementFiltersComponent,EvenementRegistrationComponent],
  templateUrl: './card-evenement.component.html',
  styleUrl: './card-evenement.component.css'
})
export class CardEvenementComponent {
  
  evenements:Evenement[] = [];

  @Output() filteredEvenements = new EventEmitter<Evenement[]>();

  constructor (private evenementService: EvenementService) {
    this.evenementService.getAllEvenements().subscribe((data: Evenement[]) => {
      this.evenements = data;
    });
  }

  

}
