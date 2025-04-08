import { render, screen, fireEvent } from '@testing-library/react';
import Inscription from '../components/Auth/inscription';
import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';

describe('Inscription', () => {
  test('renders inscription form with name, email, and password fields', () => {
    render(<Inscription />);
    expect(screen.getByLabelText(/nom/i)).toBeInTheDocument();
    expect(screen.getByLabelText(/email/i)).toBeInTheDocument();
    expect(screen.getByLabelText(/mot de passe/i)).toBeInTheDocument();
    expect(screen.getByRole('button', { name: /s'inscrire/i })).toBeInTheDocument();
  });

  test('displays error message on failed registration', async () => {
    render(<Inscription />);
    fireEvent.change(screen.getByLabelText(/nom/i), { target: { value: 'Test User' } });
    fireEvent.change(screen.getByLabelText(/email/i), { target: { value: 'test@example.com' } });
    fireEvent.change(screen.getByLabelText(/mot de passe/i), { target: { value: 'pass' } });
    fireEvent.click(screen.getByRole('button', { name: /s'inscrire/i }));

    const errorMessage = await screen.findByText(/erreur lors de l'inscription/i);
    expect(errorMessage).toBeInTheDocument();
  });
});
