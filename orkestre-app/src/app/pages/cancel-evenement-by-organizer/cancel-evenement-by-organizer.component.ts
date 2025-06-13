import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-cancel-evenement-by-organizer',
  imports: [],
  templateUrl: './cancel-evenement-by-organizer.component.html',
  styleUrl: './cancel-evenement-by-organizer.component.css'
})
export class CancelEvenementByOrganizerComponent {


  @Input() evId: number = 0;


}