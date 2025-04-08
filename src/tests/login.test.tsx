import { render, screen, fireEvent } from '@testing-library/react';
import Login from '../components/Auth/login';
import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';

describe('Login', () => {
  test('renders login form with email and password fields', () => {
    render(<Login />);
    expect(screen.getByLabelText(/email/i)).toBeInTheDocument();
    expect(screen.getByLabelText(/mot de passe/i)).toBeInTheDocument();
    expect(screen.getByRole('button', { name: /se connecter/i })).toBeInTheDocument();
  });

  test('displays error message on invalid login', async () => {
    render(<Login />);
    fireEvent.change(screen.getByLabelText(/email/i), { target: { value: 'test@example.com' } });
    fireEvent.change(screen.getByLabelText(/mot de passe/i), { target: { value: 'wrongpass' } });
    fireEvent.click(screen.getByRole('button', { name: /se connecter/i }));

    const errorMessage = await screen.findByText(/identifiants incorrects/i);
    expect(errorMessage).toBeInTheDocument();
  });
});
