import { Component, Input } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { EvenementRegistrationComponent } from '../evenement-registration/evenement-registration.component';
import { EvenementService } from '../../services/evenement.service';
import { Evenement } from '../../shared/models/evenement';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-evenement-details',
  imports: [RouterLink,EvenementRegistrationComponent,CommonModule],
  templateUrl: './evenement-details.component.html',
  styleUrl: './evenement-details.component.css'
})
export class EvenementDetailsComponent {

  evenement:Evenement = {} as Evenement;

    constructor(
    private route: ActivatedRoute,
    private evenementService: EvenementService
  ) {
    const id = Number(this.route.snapshot.paramMap.get('id')); // Get the 'id' parameter from the route
    if (id) {
      this.evenementService.findEvenementById(id).subscribe((data) => {
        this.evenement = data;
      });
    }
  }
}


