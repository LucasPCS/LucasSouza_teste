import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { NgxMaskModule } from 'ngx-mask';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import {ROUTES} from './app.routes';

import { AppComponent } from './app.component';
import { CorridasMenuComponent } from './corridas-menu/corridas-menu.component';
import { CorridasService } from './corridas-menu/corridas/corridas.service';
import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import { MotoristasMenuComponent } from './motoristas-menu/motoristas-menu.component';
import { MotoristasService } from './motoristas-menu/motoristas/motoristas.service';
import { PassageirosMenuComponent } from './passageiros-menu/passageiros-menu.component';
import { FormCorridaComponent } from './corridas-menu/form-corrida/form-corrida.component';
import { FormCorridaService } from './corridas-menu/form-corrida/form-corrida.service';
import { FormMotoristaService } from './motoristas-menu/form-motorista/form-motorista.service';
import { FormPassageiroService } from './passageiros-menu/form-passageiro/form-passageiro.service';
import { CorridasComponent } from './corridas-menu/corridas/corridas.component';
import { CorridaComponent } from './corridas-menu/corridas/corrida/corrida.component';
import { FormMotoristaComponent } from './motoristas-menu/form-motorista/form-motorista.component';
import { MotoristasComponent } from './motoristas-menu/motoristas/motoristas.component';
import { MotoristaComponent } from './motoristas-menu/motoristas/motorista/motorista.component';
import { FormPassageiroComponent } from './passageiros-menu/form-passageiro/form-passageiro.component';
import { PassageirosComponent } from './passageiros-menu/passageiros/passageiros.component';
import { PassageiroComponent } from './passageiros-menu/passageiros/passageiro/passageiro.component';
import { PassageirosService } from './passageiros-menu/passageiros/passageiros.service';

@NgModule({
    declarations: [
        AppComponent,
        CorridasMenuComponent,
        HeaderComponent,
        HomeComponent,
        MotoristasMenuComponent,
        PassageirosMenuComponent,
        FormCorridaComponent,
        CorridasComponent,
        CorridaComponent,
        FormMotoristaComponent,
        MotoristasComponent,
        MotoristaComponent,
        FormPassageiroComponent,
        PassageirosComponent,
        PassageiroComponent
    ],
    imports: [
        BrowserModule,
        HttpModule,
        RouterModule.forRoot(ROUTES),
        FormsModule,
        NgxMaskModule.forRoot()
    ],
    providers: [
        CorridasService,
        FormCorridaService,
        MotoristasService,
        FormMotoristaService,
        FormPassageiroService,
        PassageirosService
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
