import { Routes } from '@angular/router';

import { CorridasMenuComponent } from './corridas-menu/corridas-menu.component';
import { CorridasComponent } from './corridas-menu/corridas/corridas.component';
import { FormCorridaComponent } from './corridas-menu/form-corrida/form-corrida.component';
import { FormMotoristaComponent } from './motoristas-menu/form-motorista/form-motorista.component';
import { FormPassageiroComponent } from './passageiros-menu/form-passageiro/form-passageiro.component';
import { HomeComponent } from './home/home.component';
import { MotoristasComponent } from './motoristas-menu/motoristas/motoristas.component';
import { MotoristasMenuComponent } from './motoristas-menu/motoristas-menu.component';
import { PassageirosComponent } from './passageiros-menu/passageiros/passageiros.component';
import { PassageirosMenuComponent } from './passageiros-menu/passageiros-menu.component';

export const ROUTES: Routes = [
    {path: '', component: HomeComponent},
    {path: 'motorista', component: MotoristasMenuComponent,
        children: [
            {path: '', redirectTo: 'todos', pathMatch: 'full'},
            {path: 'todos', component: MotoristasComponent},
            {path: 'cadastro', component: FormMotoristaComponent}
        ]
    },
    {path: 'passageiro', component: PassageirosMenuComponent,
        children: [
            {path: '', redirectTo: 'todos', pathMatch: 'full'},
            {path: 'todos', component: PassageirosComponent},
            {path: 'cadastro', component: FormPassageiroComponent}
        ]
    },
	{path: 'corrida', component: CorridasMenuComponent,
		children: [
			{path: '', redirectTo: 'todos', pathMatch: 'full'},
			{path: 'todos', component: CorridasComponent},
			{path: 'cadastro', component: FormCorridaComponent}
		]
	}
]
