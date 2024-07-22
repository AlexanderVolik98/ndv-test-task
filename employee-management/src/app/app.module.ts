import { FormsModule } from '@angular/forms';
import {AppComponent} from "./app.component";
import {EmployeeComponent} from "./employee/employee.component";
import {NgModule} from "@angular/core";
import {NgForOf} from "@angular/common";

// и другие нужные импорты

@NgModule({
  declarations: [
    //...
    EmployeeComponent
  ],
  imports: [
    //...
    FormsModule,
    NgForOf
  ],
  providers: [],
  exports: [
    EmployeeComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

