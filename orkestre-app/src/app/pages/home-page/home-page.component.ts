import { Component } from '@angular/core';
import { NavBarComponent } from "../nav-bar/nav-bar.component";
import { HeaderComponent } from "../../shared/header/header.component";
import { MainPageComponent } from "../main-page/main-page.component";
import { FooterComponent } from "../../shared/footer/footer.component";

@Component({
  selector: 'app-home-page',
  imports: [NavBarComponent, HeaderComponent, MainPageComponent, FooterComponent],
  templateUrl: './home-page.component.html',
  styleUrl: './home-page.component.css'
})
export class HomePageComponent {

}
