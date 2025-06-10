import { Component } from '@angular/core';
import { EvenementService } from '../../services/evenement.service';
import { Evenement } from '../../shared/models/evenement';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-evenement-registration',
  imports: [CommonModule],
  templateUrl: './evenement-registration.component.html',
  styleUrl: './evenement-registration.component.css',
})
export class EvenementRegistrationComponent {
  successMessage: string | null = null;
  errorMessage: string | null = null;

  selectedEvenement: Evenement = {} as Evenement;

  constructor(private evenementService: EvenementService) {}

  registrationValidation(id: number, status:boolean) {
    this.evenementService.evenementRegistration(id,status).subscribe({
      next: () => {
        this.successMessage =
          "Vous vous êtes inscrit avec succès à l'événement";
      },
      error: (err) => {
        this.errorMessage =
          "Il y a eu une erreur lors de l'inscription à l'événement. Veuillez réessayer plus tard.";
      },
    });
  }

  setSelectedReview(evenement: Evenement) {
    this.selectedEvenement = evenement;
  }

  closeAlert() {
    this.successMessage = null;
  }
  closeErrorAlert() {
    this.errorMessage = null;
  }
}
