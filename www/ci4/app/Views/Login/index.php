<div class="hero" style="background-image: url('<?php echo base_url('images/backgroundLogin.jpg'); ?>');">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 10px;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="<?php echo base_url('images/loginForm.JPG'); ?>" alt="login form"
                                    class="img-fluid w-100 h-100" style="border-radius: 10px 0 0 10px;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                    <?php endif; ?>
                                    <form method="post" action="<?php echo base_url('utenti/LoggingIn'); ?>">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Accedi</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Accedi con il tuo
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17" name="email"
                                            class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Indirizzo email o Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <style>.bold{ font-weight: 600;}</style>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block bold" type="submit">Login</button>
                                        </div>
                                        <a class="small text-muted" href="<?php echo base_url('Utenti/vCambioPass'); ?>">Hai dimenticato la password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Non hai un account? <a href="<?php echo base_url('Utenti/vSignup'); ?>"
                                                style="color: #14a3db; text-decoration: underline;">Registrati qui</a>
                                        </p>
                                        <a href="#!" class="small text-muted">Termini di utilizzo</a>
                                        <a href="#!" class="small text-muted">Polizza della privacy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>