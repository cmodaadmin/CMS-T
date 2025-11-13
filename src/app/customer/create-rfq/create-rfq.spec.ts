import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateRfq } from './create-rfq';

describe('CreateRfq', () => {
  let component: CreateRfq;
  let fixture: ComponentFixture<CreateRfq>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CreateRfq]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CreateRfq);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
