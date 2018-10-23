import { API } from '../../../app.api';
import { Component, OnInit, Input } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { Motorista } from './motorista.model';
import { map } from 'rxjs/operators';

@Component({
    selector: 'tpu-motorista',
    templateUrl: './motorista.component.html',
    styleUrls: ['./motorista.component.css']
})
export class MotoristaComponent implements OnInit {

    @Input() motorista: Motorista;

    public idade: number
    public cpf: string

    constructor(private http: Http) { }

    ngOnInit() {
        let dataString = this.motorista.dataNascMotorista;
        let dataNasc = new Date(dataString);
        let timeDiff = Math.abs(Date.now() - dataNasc.getTime());
        this.idade = Math.floor((timeDiff / (1000 * 3600 * 24))/365);

        this.cpf = this.motorista.cpfMotorista;
        this.cpf = this.cpf.substring(0,3)+"."+this.cpf.substr(3,3)+"."+this.cpf.substr(6,3)+"-"+this.cpf.substr(9,2);
    }

    toggleActive(idMotorista){
        let toSub = this.changeStatus(idMotorista);
        toSub.subscribe(
            data => this.motorista.statusMotorista = data.statusMotorista,
            error => console.error(JSON.stringify(error))
        );
    }

    changeStatus(idMotorista): Observable<Motorista>{
        //http://localhost/api/motorista/change-status.php?idMotorista=1
        return this.http.get(`${API}/motorista/change-status.php?idMotorista=${idMotorista}`).pipe(
		map(response => response.json()));

    }
}
