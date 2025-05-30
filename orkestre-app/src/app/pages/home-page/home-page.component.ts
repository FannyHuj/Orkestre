import { Component } from '@angular/core';
import { OrkestrePresentationComponent } from "../orkestre-presentation/orkestre-presentation.component";

@Component({
  selector: 'app-home-page',
  imports: [OrkestrePresentationComponent],
  templateUrl: './home-page.component.html',
  styleUrl: './home-page.component.css'
})
export class HomePageComponent {

}
