import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'tpu-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  toggle(x) {
    x.classList.toggle("colapse");
    document.getElementById("nav-bar-lateral").classList.toggle("nav-bar-collapsed");
    document.getElementById("toggle-holder").classList.toggle("toggler-move");
  }

}
