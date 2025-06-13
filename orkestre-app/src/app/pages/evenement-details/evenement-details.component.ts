import { Component, Input } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { EvenementRegistrationComponent } from '../evenement-registration/evenement-registration.component';
import { EvenementService } from '../../services/evenement.service';
import { Evenement } from '../../shared/models/evenement';
import { CommonModule } from '@angular/common';
import { AuthenticationService } from '../../services/authentication.service';
import { User } from '../../shared/models/user';
import { CancelEvenementByOrganizerComponent } from '../cancel-evenement-by-organizer/cancel-evenement-by-organizer.component';

@Component({
  selector: 'app-evenement-details',
  imports: [RouterLink, EvenementRegistrationComponent, CommonModule,CancelEvenementByOrganizerComponent],
  templateUrl: './evenement-details.component.html',
  styleUrl: './evenement-details.component.css',
})
export class EvenementDetailsComponent {
  evenement: Evenement = {} as Evenement;
  userConnected = {} as User;
  selectedEvenement: Evenement = {} as Evenement;


  constructor(
    private route: ActivatedRoute,
    private evenementService: EvenementService,
    private authenticationService: AuthenticationService
  ) {

     this.authenticationService.getUser().subscribe({
    next: (user) => {
      this.userConnected = user;
    },
    error: (err) => {
      console.error('Erreur:', err);
    },
  });
   
    const id = Number(this.route.snapshot.paramMap.get('id')); // Get the 'id' parameter from the route
    if (id) {
      this.evenementService.findEvenementById(id).subscribe((data) => {
        this.evenement = data;
      });
    }
  }

  cancelEvenementByOrganizer() {
  this.evenementService.cancelEvenementByOrganizer(this.selectedEvenement.id, this.userConnected.id).subscribe();
}
}
