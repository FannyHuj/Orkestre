import { Component, EventEmitter, Output} from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Evenement } from '../../shared/models/evenement';
import { EvenementFilters } from '../../shared/models/evenement-filters';
import { EvenementService } from '../../services/evenement.service';

@Component({
  selector: 'app-evenement-filters',
  imports: [CommonModule, FormsModule, RouterModule],
  templateUrl: './evenement-filters.component.html',
  styleUrl: './evenement-filters.component.css'
})
export class EvenementFiltersComponent {

  evenement: Evenement = {} as Evenement;
  evenementList: Evenement[] = [];
  filters:EvenementFilters = {} as EvenementFilters;

  @Output() evenementsFound = new EventEmitter<Evenement[]>();

  constructor (private service: EvenementService) {
    this.service.getAllEvenements().subscribe((evenements: Evenement[]) => {
      this.evenementList = evenements;
    });
  }

  applyFilters(){
    if (this.filters.date === undefined) {
      this.filters.date = new Date().toISOString();}
    this.service.getFilteredEvenements(this.filters).subscribe((data: Evenement[]) => {
      this.evenementList = data;
    });
  }


}
