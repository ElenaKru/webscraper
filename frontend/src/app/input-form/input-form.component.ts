import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-input-form',
  templateUrl: './input-form.component.html',
  styleUrls: ['./input-form.component.scss']
})
export class InputFormComponent implements OnInit {
  crawlerForm!: FormGroup; // Initialize with "!" to indicate it will be initialized later

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.crawlerForm = this.formBuilder.group({
      url: ['', [Validators.required, Validators.pattern('https?://.+')]],
      depth: ['', [Validators.required, Validators.min(1)]]
    });
  }

  submitForm() {
    if (this.crawlerForm.valid) {
      // Handle form submission here
      const formData = this.crawlerForm.value;
      console.log('Submitted Data:', formData);
    }
  }
}
