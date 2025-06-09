import { Component} from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { Evenement } from '../../shared/models/evenement';

@Component({
  selector: 'app-evenement-filters',
  imports: [CommonModule, FormsModule, RouterModule],
  templateUrl: './evenement-filters.component.html',
  styleUrl: './evenement-filters.component.css'
})
export class EvenementFiltersComponent {

  evenement: Evenement = {} as Evenement;



}
